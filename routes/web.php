<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth
Auth::routes();

//Home
Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('home#about','HomeController@index')->name('about');
Route::get('home#contact','HomeController@index')->name('contact');

Route::get('books','BooksController@index')->name('books');
Route::get('books/{book}','BooksController@show')->name('showBook');
Route::get('categories/{category}','BookCategoriesController@index')->name('booksInCategory');
Route::post('bookissue/{book}','BookIssuesController@borrow')->name('borrowBook');
Route::get('searchbooks','SearchController@index');

Route::get('myprofile','MembersController@myprofile')->name('myProfile');
Route::put('myprofile/{user}','MembersController@updatemyprofile')->name('updateMyProfile');
Route::get('changePassword','MembersController@showChangePasswordForm')->name('showChangePasswordForm');
Route::post('changePassword','MembersController@changePassword')->name('changePassword');
Route::get('notifications','MembersController@notifications')->name('notifications');
Route::get('mybookissuelog','BookIssuesController@myBookIssueLog')->name('mybookissuelog');


// Administration
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');

    //Books
    Route::get('booklist','BooksController@admin_book_index')->name('booklist');
    Route::get('bookslist/{book}','BooksController@admin_book_show')->name('showbooklist');
    Route::get('books/create','BooksController@create')->name('createNewBook');
    Route::post('booklist','BooksController@store');
    Route::get('booklist/{book}/edit','BooksController@edit')->name('editBook');
    Route::put('booklist/{book}','BooksController@update')->name('updateBook');
    Route::delete('booklist/{book}','BooksController@destroy');

    //Book Categories
    Route::get('bookcategorieslist','BookCategoriesController@admin_book_categories_index')->name('bookcategorieslist');
    Route::get('book_categories/create','BookCategoriesController@create')->name('createNewBookCategory');
    Route::post('book_categories','BookCategoriesController@store');
    Route::get('bookcategorieslist/{category}/edit','BookCategoriesController@edit')->name('editBookCategory');
    Route::put('bookcategorieslist/{category}','BookCategoriesController@update')->name('updateBookCategory');
    Route::delete('bookcategorieslist/{category}','BookCategoriesController@destroy');

    //Membership Types
    Route::get('membershiptypeslist','MembershipTypesController@index')->name('membershiptypeslist');
    Route::get('membershiptypes/create','MembershipTypesController@create')->name('createNewMembershipType');
    Route::post('membershiptypeslist','MembershipTypesController@store');
    Route::get('membershiptypeslist/{membership_type}/edit','MembershipTypesController@edit')->name('editMembershipType');
    Route::put('membershiptypeslist/{membership_type}','MembershipTypesController@update')->name('updateMembershipType');

    //Members/Users
    Route::get('registeredmembers','MembersController@index')->name('registeredmemberslist');
    Route::get('members/create','MembersController@create')->name('createNewMember');
    Route::post('members','MembersController@store');
    Route::get('searchmembers','SearchController@usersearch');
    Route::put('registeredmemberslist/clearfine/{member}','MembersController@clearFine')->name('clearMemberFine');
    Route::get('registeredmemberslist/{member}/edit','MembersController@edit')->name('editMemberDetails');
    Route::put('registeredmemberslist/{member}','MembersController@update')->name('updateMemberDetails');
    Route::delete('registeredmemberslist/{member}','MembersController@destroy');
    
    //Book Issues
    Route::get('bookissueslog','BookIssuesController@index')->name('bookissueslog');
    Route::get('pendingbookissues','BookIssuesController@pendingBookIssues')->name('pendingBookIssues');
    Route::put('bookissueslog/{bookissue}/approve','BookIssuesController@approve')->name('approveBookIssue');
    Route::put('bookissueslog/{bookissue}/decline','BookIssuesController@decline')->name('declineBookIssue');
    Route::put('mybookissuelog/{bookissue}','BookIssuesController@return')->name('returnBook');
    Route::get('bookissueslog/create','BookIssuesController@create')->name('createNewBookIssue');
    Route::post('bookissueslog','BookIssuesController@store');
    Route::get('bookissueslog/{bookissue}/edit','BookIssuesController@edit')->name('editBookIssue');
    Route::put('bookissueslog/{bookissue}','BookIssuesController@update')->name('updateBookIssue');
    Route::delete('bookissueslog/{bookissue}','BookIssuesController@destroy');
    
});
