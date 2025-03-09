
<?php
// routes/api.php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resources([
        'portfolios' => PortfolioController::class,
        'education' => EducationController::class,
        'experience' => ExperienceController::class,
        'services' => ServiceController::class,
        'skills' => SkillController::class,
        'social-links' => SocialLinkController::class,
        'projects' => ProjectController::class,
        'project-images' => ProjectImageController::class,
    ]);
    Route::prefix('portfolio')->group(function () {
        Route::get('user/{user_id}', [PortfolioController::class, 'userPortfolio']);
      
    });
    Route::prefix('education')->group(function () {
        Route::get('portfolio/{portfolio_id}', [EducationController::class, 'portfolioEducation']);
      
    });
    Route::prefix('experience')->group(function () {
        Route::get('portfolio/{portfolio_id}', [ExperienceController::class, 'portfolioExperience']);
      
    });
});