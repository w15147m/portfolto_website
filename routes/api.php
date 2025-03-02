<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImageController;

// Grouped resource routes
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
