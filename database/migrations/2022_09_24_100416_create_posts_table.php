<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('image');
            $table->foreignId('user_id')
                ->constrained()//本来は（）の中に必要だが、上の行の_idの前までの値の複数形と一緒であれば記入する必要はない。
                ->cascadeOnUpdate()
                ->cascadeOnDelete();//ユーザーが削除された時に記事も削除するか否か
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
