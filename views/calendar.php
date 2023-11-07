<?php include 'components/head.php'; ?>
<?php include 'components/navbar.php'; ?>

<div class="container calendar">
    <h2>Année <?= $year ?></h2>

    <div class="year">
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= $this_day ?></p>
                <?php if ($adminconnect == true) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="new_poster">
                    <?php if ($adminconnect == true) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_infos">
                    <div class="item_event">
                        <h4>Titre de l'évènement</h4>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <div class="infos_event">
                    <div class="item_event_place">
                        <p>Lieux: </p>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="butpart">
                        <a href="" id="part">
                            <button class="part">Participer</button>
                        </a>
                        <?php if ($adminconnect == true) { ?>
                            <button class="classify">Archiver</button>
                            <button class="classify">Supprimer</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= $this_day ?></p>
                <?php if ($adminconnect == true) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="new_poster">
                    <?php if ($adminconnect == true) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_infos">
                    <div class="item_event">
                        <h4>Titre de l'évènement</h4>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <div class="infos_event">
                    <div class="item_event_place">
                        <p>Lieux: </p>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="butpart">
                        <a href="" id="part">
                            <button class="part">Participer</button>
                        </a>
                        <?php if ($adminconnect == true) { ?>
                            <button class="classify">Archiver</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= $this_day ?></p>
                <?php if ($adminconnect == true) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="new_poster">
                    <?php if ($adminconnect == true) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_infos">
                    <div class="item_event">
                        <h4>Titre de l'évènement</h4>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <div class="infos_event">
                    <div class="item_event_place">
                        <p>Lieux: </p>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="butpart">
                        <a href="" id="part">
                            <button class="part">Participer</button>
                        </a>
                        <?php if ($adminconnect == true) { ?>
                            <button class="classify">Archiver</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= $this_day ?></p>
                <?php if ($adminconnect == true) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="new_poster">
                    <?php if ($adminconnect == true) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_infos">
                    <div class="item_event">
                        <h4>Titre de l'évènement</h4>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <div class="infos_event">
                    <div class="item_event_place">
                        <p>Lieux: </p>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="butpart">
                        <a href="" id="part">
                            <button class="part">Participer</button>
                        </a>
                        <?php if ($adminconnect == true) { ?>
                            <button class="classify">Archiver</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="display_event">
            <div class="item_event">
                <p class="date"><?= $this_day ?></p>
                <?php if ($adminconnect == true) { ?>
                    <button class="edit_date icon_edit_event">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                <?php } ?>
            </div>
            <div class="display_event">
                <div class="new_poster">
                    <?php if ($adminconnect == true) { ?>
                        <button class="edit_date icon_edit_event edit_poster">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    <?php } ?>

                </div>
                <div class="event_infos">
                    <div class="item_event">
                        <h4>Titre de l'évènement</h4>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                </div>
                <div class="infos_event">
                    <div class="item_event_place">
                        <p>Lieux: </p>
                        <?php if ($adminconnect == true) { ?>
                            <button class="edit_date icon_edit_event">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="butpart">
                        <a href="" id="part">
                            <button class="part">Participer</button>
                        </a>
                        <?php if ($adminconnect == true) { ?>
                            <button class="classify">Archiver</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

<?php include 'components/footer.php'; ?>