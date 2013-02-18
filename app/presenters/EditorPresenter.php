<?php

use Nette\Application\UI\Form;

/**
 * Presenter, který zajišťuje výpis seznamů úkolů.
 *
 * @property callable $taskFormSubmitted
 */
class EditorPresenter extends BasePresenter {

    private $listRepository;
    private $taskRepository;
    private $userRepository;
    private $list;
    private $ochrana_rostlin;
    private $id;

    public function inject(Todo\TaskRepository $taskRepository, Todo\ListRepository $listRepository, Todo\UserRepository $userRepository, Todo\Ochrana_rostlinRepository $ochrana_rostlinRepository) {
	$this->taskRepository = $taskRepository;
	$this->listRepository = $listRepository;
	$this->userRepository = $userRepository;
	$this->ochrana_rostlin = $ochrana_rostlinRepository;
    }

    protected function startup() {
	parent::startup();

	if (!$this->getUser()->isLoggedIn()) {
	    $this->redirect('Sign:in');
	}
    }

    public function actionDefault($id) {
	$this->ochrana_rostlin = $this->ochrana_rostlin->findAll();
	$this->id = $id;
    }

    public function renderDefault($id = 0) {
	$this->template->id = $this->id;
	$this->template->ochrana_rostlin = $this->ochrana_rostlin;
    }

    /**
     * @return Todo\TaskListControl
     */
    protected function createComponentTaskList() {
	if ($this->list === NULL) {
	    $this->error('Wrong action');
	}

	return new Todo\TaskListControl($this->listRepository->tasksOf($this->list), $this->taskRepository);
    }

    /**
     * @return Nette\Application\UI\Form
     */
    protected function createComponentTaskForm() {
	$userPairs = $this->userRepository->findAll()->fetchPairs('id', 'name');

	$form = new Form();
	$form->addText('text', 'Úkol:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat text úkolu.');
	$form->addSelect('userId', 'Pro:', $userPairs)
		->setPrompt('- Vyberte -')
		->addRule(Form::FILLED, 'Je nutné vybrat, komu je úkol přiřazen.')
		->setDefaultValue($this->getUser()->getId());

	$form->addSubmit('create', 'Vytvořit');
	$form->onSuccess[] = $this->taskFormSubmitted;

	return $form;
    }

    /**
     * @param  Nette\Application\UI\Form $form
     */
    public function taskFormSubmitted(Form $form) {
	$this->taskRepository->createTask($this->list->id, $form->values->text, $form->values->userId);
	$this->flashMessage('Úkol přidán.', 'success');
	if (!$this->isAjax()) {
	    $this->redirect('this');
	}

	$form->setValues(array('userId' => $form->values->userId), TRUE);
	$this->invalidateControl('form');
	$this['taskList']->invalidateControl();
    }

    protected function createComponentOchrana_rostlinForm() {
	$userPairs = $this->userRepository->findAll()->fetchPairs('id', 'name');

	$form = new Form();
	$form->addText('text', 'Úkol:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat text úkolu.');
	$form->addSelect('userId', 'Pro:', $userPairs)
		->setPrompt('- Vyberte -')
		->addRule(Form::FILLED, 'Je nutné vybrat, komu je úkol přiřazen.');
	$form->addSubmit('create', 'Vytvořit');
	return $form;
    }

}
