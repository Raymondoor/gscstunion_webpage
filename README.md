## GSC学生連合HP
#### リンク：[www.cc.aoyama.ac.jp/~gscstunion/](www.cc.aoyama.ac.jp/~gscstunion/)
私たちについての詳細は是非HPやSNSよりご確認ください！

### Code↓
##### required config
```
* /app/api/validate_admin.php
    ip_gate()
        $iprange

* /app/api/general/LINK.php
	HOME_PATH

* /app/data/user.php
    $usrnm
    $pswrd

* /.htaccess
	ErrorDocument path
```
##### git
add 
```
"app/data"
```
to ".gitignore" to avoid leaking private info.

##### third-party code
[anime.js (Julian Garnier)](https://github.com/juliangarnier/anime/)
[HTML Purifier](http://htmlpurifier.org/)
[jQuery](https://jquery.com/license/)
[Quill](https://quilljs.com/)

##### Fonts
[(Zen Kaku Gothic Antique | Zen Maru Gothic | Zen Old Mincho) by Google Fonts](https://fonts.google.com/share?selection.family=Zen+Kaku+Gothic+Antique|Zen+Maru+Gothic|Zen+Old+Mincho)

### Licensing Information

This repository contains both source code and content (e.g., images, media files). They are licensed separately as follows:

- **Source Code**: Licensed under the MIT License (see `LICENSE`). You are free to use, copy, modify, and distribute the source code as you see fit, provided you include the license and copyright notice.
- **Content**: All rights reserved (see `CONTENT_LICENSE`). Images, graphics, and other non-code assets may not be used, copied, or distributed under any circumstances without explicit written permission from "GSCstunion".