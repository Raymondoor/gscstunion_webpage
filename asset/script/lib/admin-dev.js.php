<?php
use Raymondoor\Model\Logger;
if(isset($_GET['gl']) && $_GET['gl'] === 'log'){
    $logs = Logger::allForDisp();?>
<script src="<?=SCRIPT_URL?>/gridjs.umd.js"></script>
<script>
    new gridjs.Grid({
        columns:[
            {
                name:'内容'
            },
            {
                name:'日付',
            },
            {
                name:'識別名'
            },
            {
                name:'識別コード',
                formatter:(cell) => gridjs.html(`<strong>${cell}</strong>`)
            }],
        data:[
<?php foreach($logs as $log){?>
            ['<?=$log['message']?>', '<?=$log['created_at']?>', '<?=$log['name']?>', '<?=$log['level']?>'],
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
                'placeholder':'検索',
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
            noRecordsFound:' ',
            error:'読み込みエラーが発生しました。',
        }
    }).render(document.getElementById('logtable'));
</script>
<?php }?>