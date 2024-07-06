# Laravel 11 Real Time Chat

My second project using **Laravel, Tailwind, Reverb and Echo**

I used Laravel Reverb on server side and Laravel Echo on client slide. 

### 🌟 Key Features
- room based chat
- using IP instead of username
- uploading images

### 🧰 How to configure and start the app?

1. Clone the repository `git clone https://github.com/bagbaq/real-time-chat.git`
2. Run **npm install**
3. Run **composer install**
4. Run **php artisan storage:link**
5. Configure **.env.example** and rename it to **.env**

**Start the app**

1. **php artisan serve**
2. **npm run dev** (or npm run build on production environments)
3. **php artisan reverb:start**

### 📝 Todo
- Implement node.js for more performance
- Show online people count at home page and rooms
- Improve website design
