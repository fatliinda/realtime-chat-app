# Laravel Realtime Chat with Pusher

## 📌 Introduction

Hey! This is a simple real-time chat app built with **Laravel** and **Pusher**. It lets users **register, log in, send messages, and receive them in real time**. Authentication is handled using **Laravel Sanctum**.

## 🛠 Installation

1. **Clone the repo**
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```
2. **Install dependencies**
   ```bash
   composer install
   ```
3. **Set up your `.env` file**
   ```bash
   cp .env.example .env
   ```
   Configure your **database** and **Pusher credentials** inside `.env`.

4. **Migrate the database**
   ```bash
   php artisan migrate
   ```
5. **Install Sanctum** (for authentication)
   ```bash
   composer require laravel/sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
   ```
6. **Generate an app key**
   ```bash
   php artisan key:generate
   ```
7. **Configure Pusher** inside `.env`
   ```env
   BROADCAST_DRIVER=pusher
   PUSHER_APP_ID=your-app-id
   PUSHER_APP_KEY=your-app-key
   PUSHER_APP_SECRET=your-app-secret
   PUSHER_APP_CLUSTER=mt1
   ```
8. **Run the app**
   ```bash
   php artisan serve
   ```

## 🔑 Authentication API

Authentication is managed via **Laravel Sanctum**.

### 1️⃣ Register a User

**Endpoint:** `/api/register`  
**Method:** `POST`

**Payload:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password"
}
```
✅ **Response:** `{ "token": "your_api_token" }`

### 2️⃣ Login to Get a Token

**Endpoint:** `/api/login`  
**Method:** `POST`

**Payload:**
```json
{
    "email": "john@example.com",
    "password": "password"
}
```
✅ **Response:** `{ "token": "your_api_token" }`

### 3️⃣ Logout

**Endpoint:** `/api/logout`  
**Method:** `POST`

**Headers:**
```json
Authorization: Bearer your_api_token
```
✅ **Response:** `{ "message": "Logged out" }`

## 💬 Chat API

### 4️⃣ Send a Message

**Endpoint:** `/api/send-message`  
**Method:** `POST`

**Headers:**
```json
Authorization: Bearer your_api_token
```
**Payload:**
```json
{
    "message": "Hello, this is a test!"
}
```
✅ **Response:** `{ "status": "Message sent successfully" }`

### 5️⃣ Receive Messages in Real Time

Messages are broadcasted using **Pusher**. The frontend listens to the **`chat-message` event**.

## 🚀 Running the Project

To start the Laravel server:
```bash
php artisan serve
```
To start the queue worker (if needed for background jobs):
```bash
php artisan queue:work
```

## 🎯 Conclusion

This project is a **simple, secure, and scalable** real-time chat using Laravel, Sanctum, and Pusher. It allows users to **register, log in, send messages, and receive them instantly**. The API is structured for easy integration with **Vue, React, or Livewire**. Hope you find it useful! 🚀

