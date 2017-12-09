
plugin.tx_tillmanager_tillmanager {
    view {
        # cat=plugin.tx_tillmanager_tillmanager/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:till_manager/Resources/Private/Templates/
        # cat=plugin.tx_tillmanager_tillmanager/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:till_manager/Resources/Private/Partials/
        # cat=plugin.tx_tillmanager_tillmanager/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:till_manager/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_tillmanager_tillmanager//a; type=string; label=Default storage PID
        storagePid =
    }
}
