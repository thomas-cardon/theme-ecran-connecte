<?php

if(function_exists('downloadFileICS_func')) {
    $current_user = wp_get_current_user();
    if(class_exists(CodeAdeManager::class)) {
        $model = new CodeAdeManager();
        $years = $model->getCodeYear();
    }


    $page = get_page_by_title('Emploi du temps');
    $linkEDT = get_permalink($page->ID);

    $page = get_page_by_title( 'Création des comptes');
    $linkAddUser = get_permalink($page->ID);

    $page = get_page_by_title( 'Gestion des utilisateurs');
    $linkManageUser = get_permalink($page->ID);

    $page = get_page_by_title( 'Créer une alerte');
    $linkAddAlert = get_permalink($page->ID);

    $page = get_page_by_title( 'Gérer les alertes');
    $linkManageAlert = get_permalink($page->ID);

    $page = get_page_by_title( 'Créer une information');
    $linkAddInfo = get_permalink($page->ID);

    $page = get_page_by_title( 'Gérer les informations');
    $linkManageInfo = get_permalink($page->ID);

    $page = get_page_by_title( 'Gestion codes ADE');
    $linkCode = get_permalink($page->ID);

    $page = get_page_by_title( 'Mon compte');
    $linkAccount = get_permalink($page->ID);

    $page = get_page_by_title( 'Inscription');
    $linkInscrip = get_permalink($page->ID);
    ?>

    <?php if(! in_array("television", $current_user->roles)) { ?>
        <nav class="menu" id="myMenu">
            <?php if (!is_user_logged_in()) { ?>
                <a class="menu-item" href="<?php echo wp_login_url(); ?>">CONNEXION</a>
                <a class="menu-item" href="<?php echo $linkInscrip; ?>">S'INSCRIRE</a>
            <?php } elseif (is_user_logged_in() && ! in_array("technician", $current_user->roles)) { ?>
                <div class="menu-item_dropdown menu-item">
                    <button class="dropbtn">Emploi du temps
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="menu-item_dropdown-content">
                        <?php if (isset($years)) {
                            foreach ($years as $year) { ?>
                                <a href="<?php echo $linkEDT.$year['code']; ?>/"> <?php echo $year['title'] ?></a>
                            <?php }
                        } ?>
                    </div>
                </div>
                <?php if (in_array('secretaire',$current_user->roles) || in_array('administrator',$current_user->roles)) { ?>
                    <div class="menu-item_dropdown menu-item">
                        <button class="dropbtn">Utilisateurs
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="menu-item_dropdown-content">
                            <a href="<?php echo $linkAddUser; ?>"> Création des comptes</a>
                            <a href="<?php echo $linkManageUser; ?>">Gestion des utilisateurs</a>
                        </div>
                    </div>
                <?php }  if (in_array('secretaire',$current_user->roles) || in_array('administrator',$current_user->roles) || in_array('enseignant',$current_user->roles) || in_array('directeuretude',$current_user->roles)) { ?>
                    <div class="menu-item_dropdown menu-item">
                        <button class="dropbtn">Alertes
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="menu-item_dropdown-content">
                            <a href="<?php echo $linkAddAlert; ?>">Créer une alerte</a>
                            <a href="<?php echo $linkManageAlert; ?>">Gestion des alertes</a>
                        </div>
                    </div>
                    <?php if (in_array('secretaire',$current_user->roles) || in_array('administrator',$current_user->roles) || in_array('directeuretude',$current_user->roles)) { ?>
                        <div class="menu-item_dropdown menu-item">
                            <button class="dropbtn">Informations
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="menu-item_dropdown-content">
                                <a href="<?php echo $linkAddInfo; ?>">Créer une information</a>
                                <a href="<?php echo $linkManageInfo; ?>">Gestion des informations</a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (in_array('secretaire',$current_user->roles) || in_array('administrator',$current_user->roles)) { ?>
                        <a class="menu-item" href="<?php echo $linkCode; ?>"> CODES ADE</a>
                    <?php }
                } ?>
                <a class="menu-item" href="<?php echo $linkAccount; ?>">MON COMPTE</a>
                <a class="menu-item" href="<?php echo wp_logout_url(home_url()); ?>">DÉCONNEXION</a>
                <a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="switchMenu()">&#9776;</a>
            <?php } ?>
        </nav>
    <?php } else {?>
        <a class="ninja" href="<?php echo wp_logout_url(home_url()); ?>">Déconnexion</a>
    <?php }
} ?>