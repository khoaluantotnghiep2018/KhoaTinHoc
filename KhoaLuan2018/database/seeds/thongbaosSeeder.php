<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class thongbaosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('thong_baos')->insert([ 

            'tieude' => "Lịch học kỳ II", 
            'noidung' => "<hr> 
						» Đã có lịch thi chính thức, SV truy cập trang web để xem lịch thi cụ thể.<hr> 
						» Đã có lịch thi chính thức, SV truy cập trang web để xem lịch thi cụ thể.<hr> 
						» Đã có lịch thi chính thức, SV truy cập trang web để xem lịch thi cụ thể.<hr> 
						» Đã có lịch thi chính thức, SV truy cập trang web để xem lịch thi cụ thể.<hr> 
						<hr>",
            'ghichu' => "* Thông báo cập nhật lúc 18h40 ngày 10/01/2019.", 
            'ngaybatdau' => Carbon::now('Asia/Ho_Chi_Minh'),
            'ngayhethan' => Carbon::now('Asia/Ho_Chi_Minh'),  
        ]);
    }
}
