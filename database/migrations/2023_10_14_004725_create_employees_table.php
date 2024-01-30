<?php

use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Models\EmploymentStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('photo')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('full_name')->virtualAs('concat(first_name, \' \', middle_name , \' \', last_name)');
            $table->enum('gender', GenderEnum::values());
            $table->date('date_of_birth');
            $table->string('designation')->nullable();

            $table->enum('marital_status', MaritalStatusEnum::values());
            $table->string('spouse_name')->nullable();
            $table->string('dependents')->nullable();
            $table->string('citizenship')->nullable();

            $table->foreignId('employment_status_id')->constrained('employment_statuses');
            $table->foreignId('job_category_id')->constrained('job_categories');
            $table->foreignId('job_title_id')->constrained('job_titles');
            $table->foreignId('work_shift_id')->constrained('work_shifts');

            $table->unsignedTinyInteger('status'); // from the employee status table
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
