<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableAdmin;
use App\Models\TableAuthor;
use App\Models\TableCategory;
use App\Models\TableProduce;



use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        TableAdmin::create([
            'name'=>'Admin',
            'email'=> 'admin@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('123456'),
        ]);
       
        TableAuthor::create(
            [
            'name'=>'Nguyễn Nhật Ánh',
            'desc'=>'Nguyễn Nhật Ánh là một nhà văn, nhà thơ, bình luận viên Việt Nam. Ông được biết đến qua nhiều tác phẩm văn học về đề tài tuổi trẻ, các tác phẩm của ông rất được độc giả ưa chuộng và nhiều tác phẩm đã được chuyển thể thành phim.',
            'status'=> 1
            ]
        );
        TableCategory::create(
            [
            'name'=>'Sách văn học',
            'status'=> 1
            ]
        );
        TableProduce::create(
            [
            'name'=>'NXB Kim Đồng',
            'desc'=>'Nhà xuất bản Kim Đồng trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh là Nhà xuất bản tổng hợp có chức năng xuất bản sách và văn hóa phẩm phục vụ thiếu nhi và các bậc phụ huynh trong cả nước, quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.
            Nhà xuất bản có nhiệm vụ tổ chức bản thảo, biên soạn, biên dịch, xuất bản và phát hành các xuất bản phẩm có nội dung: giáo dục truyền thống dân tộc, giáo dục về tri thức, kiến thức… trên các lĩnh vực văn học, nghệ thuật, khoa học kỹ thuật nhằm cung cấp cho các em thiếu nhi cũng như các bậc phụ huynh các kiến thức cần thiết trong cuộc sống, những tinh hoa của tri thức nhân loại nhằm góp phần giáo dục và hình thành nhân cách thế hệ trẻ.
            Đối tượng phục vụ của Nhà xuất bản là các em từ tuổi nhà trẻ mẫu giáo (1 đến 5 tuổi), nhi đồng (6 đến 9 tuổi), thiếu niên (10 đến 15 tuổi) đến các em tuổi mới lớn (16 đến 18 tuổi) và các bậc phụ huynh.',
            'status'=> 1
            ]
        );
    }

 
 
}
