<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Main Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Beranda', 'icon' => 'dashboard', 'url' => ['site/index']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Dosen', 'icon' => 'briefcase', 'url' => ['dosen/index'],'visible'=>Yii::$app->user->can('operator')],
                    ['label' => 'Jadwal', 'icon' => 'calendar', 'url' => ['jadwal/index'],'visible'=>Yii::$app->user->can('operator')],
                    ['label' => 'Verifikator', 'icon' => 'handshake-o', 'url' => ['verifikator/index'],'visible'=>Yii::$app->user->can('operator')],
                    ['label' => 'Presensi Dosen', 'icon' => 'check-circle', 'url' => ['presensi/index'],'visible'=>Yii::$app->user->can('dosen')],
                    ['label' => 'Verifikasi Presensi', 'icon' => 'check-circle', 'url' => ['presensi/verifikasi-presensi'], 'visible'=>Yii::$app->user->can('verifikator')],

                    ['label' => 'Manajemen User', 'icon' => 'users', 'url' => ['user/index'],'visible'=>Yii::$app->user->can('operator')],
                    [
                        'label' => 'Master Data',
                        'icon' => 'archive',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Prodi', 'icon' => 'database', 'url' => ['prodi/index'], 'visible' => Yii::$app->user->can('root')],
                            ['label' => 'Periode Semester', 'icon' => 'database', 'url' => ['periode/index'], 'visible' => Yii::$app->user->can('root')],

                        ], 'visible' => Yii::$app->user->can('root')],
                ],
            ]
        ) ?>

    </section>

</aside>
