# Laravel 10 功能開關

引入 laravel 的 pennant 套件來擴增允許控制線上功能開啟或者關閉的方式，通常會採取配置文件的方式來控制，也可以改採取資料庫或 Redis 來控制。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/` 來進行功能開關確認。

----

## 畫面截圖
![](https://i.imgur.com/fALFjNA.png)
> 使用路由來做確認，當你嘗試存取功能開關關閉網頁時，你會收到錯誤 403︰存取遭拒/禁止錯誤訊息

![](https://i.imgur.com/fdNd3f8.png)
> 因為功能開關關閉而遭到封鎖時，可以在主幹上進行疊代開發，新功能即便未開發完成也不會影響發布，因為它對用戶是關閉的

![](https://i.imgur.com/xJBM4gV.png)
> 允許完成後開啟功能，新功能對用戶進行發布，確認沒問題後續可以把功能開關相關判斷做清除
