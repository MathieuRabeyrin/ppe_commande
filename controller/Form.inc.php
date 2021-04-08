<?php
    class Form {
        public function __construct($products, $address) {
            $this->products = $products;
            $this->address = $address;
        }

        private function updateSession()
        {
            $flag = TRUE;
            $allZero = TRUE;

            for ($i = 0; $i < count($_SESSION['products']); $i++) {
                $key = $_SESSION['products'][$i]->name;

                if (ctype_digit($this->products[$key]) && $this->products[$key] >= 0 && $this->products[$key] <= 10) {
                    $_SESSION['products'][$i]->quantity = $this->products[$key];
                    if ($this->products[$key] != 0)
                        $allZero = FALSE;
                } else if (strlen($this->products[$key]) == 0) {
                    $_SESSION["error"] = "Les champs des produits sont obligatoires";
                    $flag = FALSE;
                } else  {
                    $_SESSION["error"] = "La quantité doit être un nombre compris entre 0 et 10";
                    $flag = FALSE;
                }
            }

            if ($allZero) {
                $_SESSION["error"] = "Merci de selectionner un produit";
                return FALSE;
            }

            return $flag;
        }

        public function checkAddress()
        {
            if (strlen($this->address) == 0) {
                $_SESSION["error"] = "Le champ addresse est obligatoire";
                return FALSE;
            }
            $_SESSION['address'] = $this->address;
            return TRUE;
        }

        public function isValid()
        {   
            if ($this->updateSession() && $this->checkAddress())
                return TRUE;
            return FALSE;
        }
    }
?>