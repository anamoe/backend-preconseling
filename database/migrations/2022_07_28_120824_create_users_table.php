<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telp');
            $table->string('password');
            $table->string('jenis_kelamin');
            $table->string('usia')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('status');
            $table->string('role');

            $table->timestamps();
        });

        User::create([
            'id'=>'1',
            'nama' => 'Siswa',
            'no_telp' => '083434567890',
            'password' => Hash::make('123456'),
            'jenis_kelamin' => 'Laki-laki',
            'usia' => '17',
            'asal_sekolah' => 'SMA',
            'status' => 'Aktif',
            'role' => 'siswa'
        ]);

        User::create([
            'id'=>'2',
            'nama' => 'Konselor',
            'no_telp' => '08523456711',
            'password' => Hash::make('123456'),
            'jenis_kelamin' => 'Laki-laki',
            'usia' => '17',
            'status' => 'Aktif',
            'role' => 'konselor'
        ]);

        User::create([
            'id'=>'3',
            'nama' => 'Guru',
            'no_telp' => '081',
            'password' =>  Hash::make('123456'),
            'jenis_kelamin' => 'Laki-laki',
            'status' => 'Aktif',
            'role' => 'guru'
        ]);
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
