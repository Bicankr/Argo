<?php

use Nette\Application\UI\Form;

class EditorPresenter extends BasePresenter {

    private $listRepository;
    private $taskRepository;
    private $userRepository;
    private $ochrana_rostlinRepository;
    private $ochrana_rostlin;
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

    public function renderDefault() {
	$this->template->id = $this->id;
	$this->template->ochrana_rostlin = $this->ochrana_rostlin;
	//$this->template->addORForm = $this->AddOchrana_rostlinForm();
    }

    protected function createComponentORForm() {
	$form = new Form();
	$form->addText('text', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat text odkazu.');
	$form->addText('odkaz', 'Odkaz:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat http odkaz.');
	$form->addHidden('id', $this->id);
	$form->addSubmit('create', 'Uložit');
	$form->addSubmit('delete', 'Smazat')
		->onClick[] = callback($this, 'ORFormDelete');
	;

	$rows = $this->ochrana_rostlinRepository->findBy(array('id' => $this->id));
	foreach ($rows as $row) {
	    $form->setDefaults(array('text' => $row->text, 'odkaz' => $row->odkaz));
	}
	$form->onSuccess[] = $this->ORFormSubmitted;
	return $form;
    }

    public function ORFormSubmitted(Form $form) {
	$this->ochrana_rostlinRepository->findBy(array('id' => $form->values->id))->update(array('text' => $form->values->text, 'odkaz' => $form->values->odkaz));
	$this->id = 0;
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

    public function ORFormDelete(Nette\Forms\Controls\SubmitButton $btn) {
	$values = $btn->form->getValues();
	$this->ochrana_rostlinRepository->findBy(array('id' => $values->id))->delete();
	$this->id = 0;
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

    protected function createComponentAddORForm() {
	$form = new Form();
	$form->addText('text', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat text odkazu.');
	$form->addText('odkaz', 'Odkaz:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat http odkaz.');
	$form->addHidden('id', $this->id);
	$form->addSubmit('create', 'Nový');
	$form->onSuccess[] = $this->addOchrana_rostlinFormSubmitted;
	return $form;
    }

    public function addOchrana_rostlinFormSubmitted(Form $form) {
	$this->ochrana_rostlinRepository->findAll()->insert(array('text' => $form->values->text, 'odkaz' => $form->values->odkaz));
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

}