<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tiểu luận chuyên ngành: Nhóm 20 - Xây dựng website bán thức ăn trực tuyến

### Hồ Duy Hoàng - 20110487

### Đàm Vinh Quang - 20110548

## Về Laravel

Laravel là một framework ứng dụng web với cú pháp linh hoạt và lịch sự. Chúng tôi tin rằng quá trình phát triển phải là một trải nghiệm sáng tạo và thú vị để thực sự đáp ứng. Laravel giúp giảm bớt những công việc phổ biến trong nhiều dự án web, như:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel là một framework tiện lợi, mạnh mẽ và cung cấp các công cụ cần thiết cho các ứng dụng lớn và mạnh mẽ.

### Url website chính: http://hoangquangtlcn.free.nf/

### Các lệnh cài đặt chương trình:

```
composer i
php artisan serve
composer require barryvdh/laravel-dompdf
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

### Thông tin thẻ thánh toán test Vnpay:

```
Ngân hàng: NCB
Số thẻ: 9704198526191432198
Tên chủ thẻ: NGUYEN VAN A
Ngày phát hành:07/15
Mật khẩu OTP:123456
```

```
Loại thẻ quốc tế VISA (No 3DS)
Số thẻ: 4456530000001005
CVC/CVV: 123
Tên chủ thẻ: NGUYEN VAN A
Ngày hết hạn:12/23
Email:test@gmail.com
Địa chỉ:22 Lang Ha
Thành phố:Ha Noi
```

```
Loại thẻ quốc tế VISA (3DS)
Số thẻ: 4456530000001096
CVC/CVV: 123
Tên chủ thẻ: NGUYEN VAN A
Ngày hết hạn: 12/23
Email: test@gmail.com
Địa chỉ: 22 Lang Ha
Thành phố: Ha Noi
```

```
Loại thẻ ATM nội địa EXIMBANK
Số thẻ: 9704310005819191
Tên chủ thẻ: NGUYEN VAN A
Ngày hết hạn:10/26
```

### Cấu hình tích hợp Vnpay vào thanh toán trực tuyến trên website:

```
Terminal ID / Mã Website (vnp_TmnCode): QMDPZXRE

Secret Key / Chuỗi bí mật tạo checksum (vnp_HashSecret): KOOETMNNKHBDNPRBMVTKSRHYBPDNCZEQ
```

### Đăng nhập tài khoản

#### Url đăng nhập trang quản trị: http://hoangquangtlcn.free.nf/login-admin

#### Url đăng nhập trang khách hàng, người dùng: http://hoangquangtlcn.free.nf/login

```
hoang (Admin)
123123

quang (Admin)
123123

customer (Customer)
123123
```
