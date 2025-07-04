<?php
use Raymondoor\Model\User;
$users = User::allAllowedGU();?>
<script src="<?=SCRIPT_URL?>/gridjs.umd.js"></script>
<script>
    new gridjs.Grid({
        columns:[
            {
                name:'登録済みアカウント',
                formatter:(cell) => gridjs.html(`<strong>${cell}</strong>`)
            },
            {
                name:'登録日'
            },
            {
                name:'権限削除',
                formatter:(cell) => gridjs.html(`<form action="<?=POST_URL?>remove-user" method="post" style="width:fit-content;margin:0 auto;"><input type="hidden" name="email" value="${cell}"><input type="submit" value="削除" class="pure-button button-error"></form>`)
            }],
        data:[
<?php foreach($users as $user){?>
            ['<?=$user['email']?>', '<?=$user['created_at']?>', '<?=$user['email']?>'],
<?php };?>
        ],
        sort:true,
        resizable:true,
        search:true,
        style:{
            td:{
                'padding':'0.5rem'
            },
            th:{
                'padding':'0.5rem',
                'text-align':'center'
            }
        },
        pagination:{
            limit:10
        },
        language:{
            'search':{
                'placeholder':'アカウント検索',
            },
            sort:{
                sortAsc:'昇順',
                sortDesc:'降順',
            },
            'pagination':{
                previous:'←',
                next:'→',
                navigate:(page, pages) => `${page} / ${pages}ページ`,
                page:(page) => `${page}ページ`,
                showing:' ',
                of:'/',
                to:'~',
                results:'項',
            },
            loading:'ロード中...',
            noRecordsFound:'アカウントが登録されていません。',
            error:'読み込みエラーが発生しました。',
        }
    }).render(document.getElementById('usertable'));
</script>