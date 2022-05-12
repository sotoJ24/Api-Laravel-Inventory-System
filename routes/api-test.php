
// {{-- Articles Routes --}}\\
Route::apiResource('articles', ArticleController::class)->names('api.v1.articles')->except(['destroy']);
