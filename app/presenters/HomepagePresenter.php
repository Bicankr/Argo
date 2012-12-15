<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter {

    public function renderDefault() {
	$this->template->anyVariable = 'any value';
    }
    public function show() {
	$this->template->anyVariable = 'show';
    }

}
