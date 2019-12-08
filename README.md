# Laravel 6 Twilio 具象狀態傳輸應用程式介面用戶端

使用 Twilio 在應用程式中嵌入語音、VoIP 和訊息傳遞功能。Twilio 平台中包含 Twilio 標記語言 (TwiML)、符合 REST 樣式的 API，以及適用於網路瀏覽器、Android 與 iOS 的 VoIP SDK。

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
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/twilio/send-sms` 來進行簡訊發送；或可以經由 `/twilio/make-call` 來進行電腦語音 Call Out 廣告。

----

## 畫面截圖
![](https://i.imgur.com/WGigXzD.png)
> 將簡訊經由網際網路傳送置你的親朋好友的行動電話或呼叫器

![](https://i.imgur.com/fnJbjog.png)
> 利用電腦語音 Call Out 系統，由市內電話或行動電話主動大量撥出電話，適用於需要大量電話外撥廣大客戶群之企業，滿足定時自動外撥的需求