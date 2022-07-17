<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('icon');
            $table->timestamps();
        });

        $categories = [
            ['per la casa', '/img/icone/presto_icona-casa.svg'],
            ['elettronica','/img/icone/presto_icona-elettronica.svg'],
            ['moda', '/img/icone/presto_icona-moda.svg'],
            ['auto e moto', '/img/icone/presto_icona-auto-moto.svg'],
            ['sport', '/img/icone/presto_icona-sport.svg'],
            ['musica', '/img/icone/presto_icona-musica.svg'],
            ['collezionismo', '/img/icone/presto_icona-collezionismo.svg'],
            ['libri', '/img/icone/presto_icona-libri.svg'],
            ['animali', '/img/icone/presto_icona-animali.svg'],
            ['console e videogiochi', '/img/icone/presto_icona-videogiochi.svg']
        ];
        foreach ($categories as $category) {
            Category::create(['name'=>$category[0],'icon'=>$category[1]]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
