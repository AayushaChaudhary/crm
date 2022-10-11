(<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('ticket_no');
                $table->foreignId('client_id')->constrained;
                $table->foreignId('airline_id')->constrained;
                $table->string('airlinepnr');
                $table->string('airline_type');
                $table->date('date');
                $table->time('time');
                $table->string('destination');
                $table->string('departure');
                $table->string('description');
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
            Schema::dropIfExists('tickets');
        }
    };
