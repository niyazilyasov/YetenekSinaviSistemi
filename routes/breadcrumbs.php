<?php

Breadcrumbs::for('admin_home', function ($trail) {
    $trail->push('Ana sayfa', route('admin_home'));
});

Breadcrumbs::for('admin_user', function ($trail) {
    $trail->parent('admin_home');
    $trail->push('Kullanıcılar', route('admin_user'));
});
Breadcrumbs::for('admin_user_create', function ($trail) {
    $trail->parent('admin_user');
    $trail->push('Kullanıcı Oluştur', route('admin_user_create'));
});


Breadcrumbs::for('admin_duyuru', function ($trail) {
    $trail->parent('admin_home');
    $trail->push('Duyurular', route('admin_duyuru'));
});
Breadcrumbs::for('admin_duyuru_create', function ($trail) {
    $trail->parent('admin_duyuru');
    $trail->push('Kullanıcı Oluştur', route('admin_duyuru_create'));
});

Breadcrumbs::for('admin_guzelSanatlarBasvuru', function ($trail) {
    $trail->parent('admin_home');
    $trail->push('Güzel Sanatlar Başvurları', route('admin_guzelSanatlarBasvuru'));
});


Breadcrumbs::for('admin_BesyoBasvuru', function ($trail) {
    $trail->parent('admin_home');
    $trail->push('Besyo Başvurları', route('admin_BesyoBasvuru'));
});

Breadcrumbs::for('admin_user_edit', function ($trail,$user) {
    $trail->parent('admin_user');
    $trail->push($user->name.' Hesabı Düzenle', route('admin_user_edit',$user->id));
});

Breadcrumbs::for('admin_duyuru_edit', function ($trail,$duyurus) {
    $trail->parent('admin_duyuru');
    $trail->push($duyurus->baslik.' Hesabı Düzenle', route('admin_duyuru_edit',$duyurus->id));
});
Breadcrumbs::for('admin_user_edit_profile', function ($trail) {
    $user=auth()->user();
    $trail->parent('admin_home');
    $trail->push($user->name.' Hesabı Düzenle', route('admin_user_edit_profile'));
});

Breadcrumbs::for('admin_guzelSanatlarBasvuru_onayla', function ($trail,$guzelSanatlarBasvuru) {
    $trail->parent('admin_guzelSanatlarBasvuru');
    $trail->push($guzelSanatlarBasvuru->name.' Başvuru Onayla', route('admin_guzelSanatlarBasvuru_onayla',$guzelSanatlarBasvuru->id));
});

Breadcrumbs::for('admin_guzelSanatlarBasvuru_reddet', function ($trail,$guzelSanatlarBasvuru) {
    $trail->parent('admin_guzelSanatlarBasvuru');
    $trail->push($guzelSanatlarBasvuru->name.' Başvuru Reddet', route('admin_guzelSanatlarBasvuru_reddet',$guzelSanatlarBasvuru->id));
});

Breadcrumbs::for('admin_guzelSanatlarBasvuru_show', function ($trail,$guzelSanatlarBasvuru) {
    $trail->parent('admin_guzelSanatlarBasvuru');
    $trail->push($guzelSanatlarBasvuru->name.' Güzel Sanatlar Başvuru Detayları', route('admin_guzelSanatlarBasvuru_show',$guzelSanatlarBasvuru->id));
});

Breadcrumbs::for('admin_BesyoBasvuru_onayla', function ($trail,$besyoBasvuru) {
    $besyoBasvuru=\App\Models\BesyoBasvuru::find($besyoBasvuru);
    $trail->parent('admin_BesyoBasvuru');
    $trail->push($besyoBasvuru->name.' Başvuru Onayla', route('admin_BesyoBasvuru_onayla',$besyoBasvuru->id));
});

Breadcrumbs::for('admin_BesyoBasvuru_reddet', function ($trail,$besyoBasvuru) {
    $besyoBasvuru=\App\Models\BesyoBasvuru::find($besyoBasvuru);

    $trail->parent('admin_BesyoBasvuru');
    $trail->push($besyoBasvuru->name.' Başvuru Reddet', route('admin_BesyoBasvuru_reddet',$besyoBasvuru->id));
});

Breadcrumbs::for('admin_BesyoBasvuru_show', function ($trail,$besyoBasvuru) {
    $besyoBasvuru=\App\Models\BesyoBasvuru::find($besyoBasvuru);

    $trail->parent('admin_BesyoBasvuru');
    $trail->push($besyoBasvuru->name.' Besyo Başvuru Detayları', route('admin_BesyoBasvuru_show',$besyoBasvuru->id));
});
Breadcrumbs::for('admin_user_show', function ($trail,$user) {
    $trail->parent('admin_user');
    $trail->push($user->name.' Kullanıcı Detayları', route('admin_user_show',$user->id));
});
Breadcrumbs::for('admin_duyuru_show', function ($trail,$duyurus) {
   
    $trail->parent('admin_duyuru');
    $trail->push($duyurus->baslik.' Kullanıcı Detayları', route('admin_duyuru_show',$duyurus->id));
});

//
//// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});
