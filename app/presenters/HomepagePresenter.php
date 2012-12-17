<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    private $menu;

    public function renderDefault() {
        $this->template->anyVariable = 'any value';
    }
    public function rendervyzivarostlin($p_menu) {
	$this->template->menu = $p_menu;
    }
    public function renderochranarostlin($p_menu) {
	$this->template->menu = $p_menu;
    }

    public function show() {
        $this->template->anyVariable = 'show';
    }


}
