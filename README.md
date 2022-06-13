# laravel
 這個小作品是以報名一個活動為流程進行撰寫，作業時間大約為6小時
 這小作品的流程是:
 1.由後臺去新建活動
 2.讓使用者報名->報名成功後會寄送Email
 3.後臺可以看到該活動的報名者
資料表:
users(使用者資料表)
name:帳號
email:信箱
password:MD5後的密碼

news(活動資料表)
title:活動名稱
date:活動時間
img:活動圖片(路徑)
content:活動內容

news_detail(報名者資料)
name:報名者姓名
new_id:活動資料表流水號
phone:報名者電話
mail:報名者信箱
