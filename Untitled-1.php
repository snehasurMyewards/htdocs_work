
entry data for every below requirement
day 1 to 31 
for 10users
some in time before 9.30am and out time after 6pm
some intime 9.30am - 10.30pm
some out time 4-5pm 
some absent No data or less than 3hr between intime out time 
some intime out time like total minimum 4hr  
some intime out time like total minimum 7hr
some sat sun fixed holiday 



Main timing 9am-6pm
After 9.30am late
before 5pm early
5 early or late 1 absent count
absent No data or less that 3hr red
Half day minimum 4hr blue
full day minimum 7hr
sat sun fixed holiday yellow


in blade page need to show coloumn name user name day 1 to last day then full day half day deduction late early absent total
like
user name day1 day2 day3 day4 day5 day6 day7 ... day31 full day half day  late early absent deduction total
test1    9.30-18.30 like that
also if absent mard red if sat sun mard yellow if half mark blue if full mark green sun sat full holiday

for this above requirement need to make logic in controller 

Main timing 9am-6pm
After 9.30am late
before 5pm early
5 early or late 1 absent count
absent No data or less that 3hr 
Half day minimum 4hr 
full day minimum 7hr
sat sun fixed holiday 
  

user attandence model and migration reletion use


php artisan make:migration create_attendances_table
php artisan make:model Attendance -m
// app/Models/Attendance.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'in_time',
        'out_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
// database/migrations/xxxx_xx_xx_create_attendances_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('in_time')->nullable();
            $table->timestamp('out_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
// database/migrations/xxxx_xx_xx_create_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}

