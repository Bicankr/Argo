<?php

use Nette\Application\UI\Form;

class EditorPresenter extends BasePresenter {

    private $listRepository;
    private $taskRepository;
    private $userRepository;
    private $ochrana_rostlinRepository;
    private $ochrana_rostlin;
    private $list;
    private $id;

    public function inject(Todo\TaskRepository $taskRepository, Todo\ListRepository $listRepository, Todo\UserRepository $userRepository, Todo\Ochrana_rostlinRepository $ochrana_rostlinRepository) {
	$this->taskRepository = $taskRepository;
	$this->listRepository = $listRepository;
	$this->userRepository = $userRepository;
	$this->ochrana_rostlinRepository = $ochrana_rostlinRepository;
    }

    protected function startup() {
	parent::startup();
	if (!$this->getUser()->isLoggedIn()) {
	    $this->redirect('Sign:in');
	}
    }

    public function actionDefault($id) {
	$this->ochrana_rostlin = $this->ochrana_rostlinRepository->findAll();
	$this->id = $id;
    }

    public function renderDefault($id = 0) {
	$this->template->id = $this->id;
	$this->template->ochrana_rostlin = $this->ochrana_rostlin;
    }

    protected function createComponentOchrana_rostlinForm() {
	$form = new Form();
	$form->addText('text', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat text odkazu.');
	$form->addText('odkaz', 'Odkaz:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat http odkaz.');
	$form->addHidden('id', $this->id);
	$form->addSubmit('create', 'Uložit');
	$row = $this->ochrana_rostlinRepository->findBy(array('id' => $this->id));
	$form->setDefaults(array('text' => $row->text, 'odkaz' => $row->odkaz));
	$form->onSuccess[] = $this->ochrana_rostlinFormSubmitted;
	return $form;
    }

    /**
     * @param  Nette\Application\UI\Form $form
     */
    public function ochrana_rostlinFormSubmitted(Form $form) {
	$this->ochrana_rostlinRepository->findBy(array('id' => $form->values->id))->update(array('text' => $form->values->text, 'odkaz' => $form->values->odkaz));

	$this->id = NULL;
	if (!$this->isAjax()) {
	    $this->redirect('this');
	}
    }

}
