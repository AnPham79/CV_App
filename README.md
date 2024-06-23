<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

// Thao tác với dự án

 - Cài đặt laravel 10

 - Cài đặt Taiwind css và cấu hình.

 - Sử dụng layout với component

 + php artisan make:component Layout --view

 - tạo jobs page và cards component

 + cài tiện ich taiwindcss intellisense ( được đề xuất )

 - tag component và job info

 - job card và link button component

 + tạo trang show

 - breadcrumb navigation

 - filtering jobs: Tailwind form plugin và text inputs

 - filtering jobs: min salary và max salary.

 - filtering jobs: input check experience.

 - Alpine.js

 - tạo employer

 - tạo controller và model cho nó

 - tạo seeder và factory.

 - thây đổi mối quan hệ giữa các bản 

 - 1 user thì có 1 employer (hasOne)

 - 1 employee thì có thể đăng nhìu job (hasMany->job và belongsto cho user)

 - jobs thì belongsto cho employer

 - load ra các công việc khác của công ty

 - đăng kí

 - đăng nhập

 - tạo migrattion job application

 - controller, model, form.

 - create và store job application

 - thêm policies cho job.   

 - thêm logic kiểm tra xem cái job đó mình đã applied chưa.

 - quản lí các công việc bản thân đã apply.

 - đếm số công việc đã apply

 - số lương trung bình mà mình đã apply vào các công ty

 - số lượng những người khác cũng apply công việc này

 - hủy apply

 - File Uploads: Understanding File System & Configuring Disks

 - vào filesystem tạo 1 'private'
    => [
        'driver' => 'local',
        'root' => storage_path('app\private),
        'visibility' => 'private'
    ]

- thêm sửa job của bản thân

- thêm middleware kiểm tra đã đăng nhập chưa mới đc thêm

- nếu chưa đăng gì thì chuyển đến trang thêm

- thêm polici cho job

- xóa mềm
 