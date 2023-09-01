
<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoTlpnToDpt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dpt', function (Blueprint $table) {
            $table->string('NoTlpn')->nullable()->after('tps'); // Kolom baru setelah kolom 'tps'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dpt', function (Blueprint $table) {
            $table->dropColumn('NoTlpn'); // Rollback: Hapus kolom 'NoTlpn'
        });
    }
}

?>