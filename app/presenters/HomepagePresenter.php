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

    /** @var Todo\TaskRepository */
    private $taskRepository;

    public function inject(Todo\TaskRepository $taskRepository) {
	$this->taskRepository = $taskRepository;
    }

    protected function startup() {
	parent::startup();

	if (!$this->getUser()->isLoggedIn()) {
	    $this->redirect('Sign:in');
	}
    }

    /** @return Todo\TaskListControl */
    public function createComponentIncompleteTasks() {
	return new Todo\TaskListControl($this->taskRepository->findIncomplete(), $this->taskRepository);
    }

    /** @return Todo\TaskListControl */
    public function createComponentUserTasks() {
	$incomplete = $this->taskRepository->findIncompleteByUser($this->getUser()->getId());
	$control = new Todo\TaskListControl($incomplete, $this->taskRepository);
	$control->displayList = TRUE;
	$control->displayUser = FALSE;
	return $control;
    }

}
