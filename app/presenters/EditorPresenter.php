<?php

use Nette\Application\UI\Form;

class EditorPresenter extends BasePresenter {

    private $userRepository;
    private $hnojivaRepository;
    private $ochrana_rostlinRepository;
    private $ochrana_rostlin;
    private $id;

    public function inject(Todo\UserRepository $userRepository, Todo\Ochrana_rostlinRepository $ochrana_rostlinRepository, Todo\HnojivaRepository $hnojivaRepository) {
	$this->taskRepository = $taskRepository;
	$this->userRepository = $userRepository;
	$this->hnojivaRepository = $hnojivaRepository;
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

    public function actionHnojiva($id) {
	$this->hnojivaRepository = $this->hnojivaRepository->findAll();
	$this->id = $id;
    }

    public function renderHnojiva() {
	$this->template->id = $this->id;
	$this->template->hnojiva = $this->hnojivaRepository;
	//$this->template->addORForm = $this->AddOchrana_rostlinForm();
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

    protected function createComponentEditHnojiva() {
	$form = new Form();
	$form->addText('nazev_pripravku', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat název přípravku.');
	$form->addText('registracni_cislo', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat registrační číslo.');
	$form->addText('drzitel_registrace', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat držitele registrace.');
	$form->addText('druh_registrace', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat druh registrace.');
	$form->addHidden('id', $this->id);
	$form->addSubmit('save', 'Uložit')
		->onClick[] = callback($this, 'saveHnojiva');
	$form->addSubmit('delete', 'Smazat')
		->onClick[] = callback($this, 'deleteHnojiva');
	;

	$rows = $this->hnojivaRepository->findBy(array('id' => $this->id));
	foreach ($rows as $row) {
	    $form->setDefaults(array('nazev_pripravku' => $row->nazev_pripravku, 'registracni_cislo' => $row->registracni_cislo, 'drzitel_registrace' => $row->drzitel_registrace, 'druh_registrace' => $row->druh_registrace));
	}
	$form->onSuccess[] = $this->ORFormSubmitted;
	return $form;
    }

    public function saveHnojiva(Form $form) {
	$this->hnojivaRepository->findBy(array('id' => $form->values->id))->update(array('text' => $form->values->text, 'odkaz' => $form->values->odkaz));
	$this->id = 0;
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

    public function deleteHnojiva(Nette\Forms\Controls\SubmitButton $btn) {
	$values = $btn->form->getValues();
	$this->hnojivaRepository->findBy(array('id' => $values->id))->delete();
	$this->id = 0;
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

    protected function createComponentAddHnojiva() {
	$form = new Form();
	$form->addText('nazev_pripravku', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat název přípravku.');
	$form->addText('registracni_cislo', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat registrační číslo.');
	$form->addText('drzitel_registrace', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat držitele registrace.');
	$form->addText('druh_registrace', 'Text:', 40, 100)
		->addRule(Form::FILLED, 'Je nutné zadat druh registrace.');
	$form->addSubmit('create', 'Nový')
		->onClick[] = callback($this, 'addHnojiva');
	return $form;
    }

    public function addHnojiva(Nette\Forms\Controls\SubmitButton $btn) {
	$values = $btn->form->getValues();
	$this->hnojivaRepository->findAll()->insert(array('nazev_pripravku' => $values->nazev_pripravku, 'registracni_cislo' => $values->registracni_cislo, 'drzitel_registrace' => $values->drzitel_registrace, 'druh_registrace' => $values->druh_registrace));
	if (!$this->isAjax()) {
	    $this->redirect('this', 0);
	}
    }

}