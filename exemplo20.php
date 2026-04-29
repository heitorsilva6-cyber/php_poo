<?php

interface INotificador {
    public function enviar($destinatario, $mensagem);
}


class EmailNotificador implements INotificador {
    public function enviar($destinatario, $mensagem) {
        echo "Enviando email para $destinatario: $mensagem <br>";
    }
}

class SMSNotificador implements INotificador {
    public function enviar($destinatario, $mensagem) {
        echo "Enviando SMS para $destinatario: $mensagem <br>";
    }
}

class NotificadorWhatsapp implements INotificador {
    public function enviar($destinatario, $mensagem) {
        echo "Enviando WhatsApp para $destinatario: $mensagem <br>";
    }
}