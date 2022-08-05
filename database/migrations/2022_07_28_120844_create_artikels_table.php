<?php

use App\Models\Artikel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->longText('isi');
            $table->string('link_youtube');
            $table->string('link_worksheet');
            $table->string('foto');
            $table->bigInteger('guru_id')->unsigned()->nullable();
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Artikel::create([
            
            'judul' => 'Inklusi',
            'foto'=>'inklusi.jpg',
            'isi' => 'Menyediakan kondisi kelas yang ramah, hangat, menerima keanekaragaman, dan menghargai perbedaan, sehingga anak berkebutuhan khusus akan merasa lebih diterima dan mudah untuk menyesuaikan. Perhatikan jumlah murid, usahakan jumlah murid tidak terlalu banyak. Maksimal 15 orang saja. Ventilasi ruangan harus cukup agar kondisi ruangan kelas menjadi terang sehingga memungkinkan belajar dengan nyaman. Pilihlah meja dan kursi yang mudah untuk dipindah-pindah sehingga memudahkan untuk berganti posisi sewaktu-waktu agar tidak bosan. Gunakan spidol warna-warni karena warna yang berbeda sangat membantu ingatan anak saat mempelajari konsep penting yang sedang diterangkan oleh guru di kelas.



            Konten ini telah tayang di Kompasiana.com dengan judul "Ingin Tahu tentang Pendidikan Inklusi? Yuk, Simak Ulasannya!", Klik untuk baca:
            https://www.kompasiana.com/anastasia53995/62d0ea44ce96e51229275582/ingin-tahu-tentang-pendidikan-inklusi-yuk-simak-ulasannya
            
            Kreator: Anastasia Bernardina
            
            
            
            Kompasiana adalah platform blog, setiap konten menjadi tanggungjawab kreator.
            
            Tulis opini Anda seputar isu terkini di Kompasiana.com',
            'link_youtube' => 'SMA',
            'link_worksheet' => 'https://docs.google.com/forms/d/10QlL7HUF_10G24oXj0ef-IAwpuXW-5V22eau8DsRs3Q/edit?usp=forms_home&ths=true',
            'guru_id' => '3'
        ]);

        Artikel::create([
            
            'judul' => 'Inklusi',
            'foto'=>'inklusi.jpg',
            'isi' => 'Menyediakan kondisi kelas yang ramah, hangat, menerima keanekaragaman, dan menghargai perbedaan, sehingga anak berkebutuhan khusus akan merasa lebih diterima dan mudah untuk menyesuaikan. Perhatikan jumlah murid, usahakan jumlah murid tidak terlalu banyak. Maksimal 15 orang saja. Ventilasi ruangan harus cukup agar kondisi ruangan kelas menjadi terang sehingga memungkinkan belajar dengan nyaman. Pilihlah meja dan kursi yang mudah untuk dipindah-pindah sehingga memudahkan untuk berganti posisi sewaktu-waktu agar tidak bosan. Gunakan spidol warna-warni karena warna yang berbeda sangat membantu ingatan anak saat mempelajari konsep penting yang sedang diterangkan oleh guru di kelas.



            Konten ini telah tayang di Kompasiana.com dengan judul "Ingin Tahu tentang Pendidikan Inklusi? Yuk, Simak Ulasannya!", Klik untuk baca:
            https://www.kompasiana.com/anastasia53995/62d0ea44ce96e51229275582/ingin-tahu-tentang-pendidikan-inklusi-yuk-simak-ulasannya
            
            Kreator: Anastasia Bernardina
            
            
            
            Kompasiana adalah platform blog, setiap konten menjadi tanggungjawab kreator.
            
            Tulis opini Anda seputar isu terkini di Kompasiana.com',
            'link_youtube' => 'SMA',
            'link_worksheet' => 'https://docs.google.com/forms/d/10QlL7HUF_10G24oXj0ef-IAwpuXW-5V22eau8DsRs3Q/edit?usp=forms_home&ths=true',
            'guru_id' => '3'
        ]);


       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikels');
    }
}
