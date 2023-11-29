<?php

class ValidateProduct
{
	protected array $data = [];

	protected array $errores = [];

	public function __construct(array $data) 
	{
		$this->data = $data;
		$this->validate();
	}

	public function hayErrores(): bool
	{
		return count($this->errores) > 0;
	
	}

	public function getErrores(): array
	{
		return $this->errores;
	}

	protected function validate(): void
	{

		if(empty($this->data['title'])) {
			$this->errores['title'] = "Add a title to this product.";
		} else if(strlen($this->data['title']) < 5) {
			$this->errores['title'] = "It need at least 5 characters.";
		}

		if(empty($this->data['description'])) {
			$this->errores['description'] = "Add a description of this product.";
		}

		if(empty($this->data['price'])) {
			$this->errores['price'] = "Add a price of this product.";
		}
	}
}