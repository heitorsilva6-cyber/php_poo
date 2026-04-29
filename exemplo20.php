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

class SistemaNotificacoes {
    private $notificador;

    public function __construct(INotificador $notificador) {
        $this->notificador = $notificador;
    }

    public function enviarNotificacao($destinatario, $mensagem) {
        $this->notificador->enviar($destinatario, $mensagem);
    }
}

$sistemasEmail = new SistemaNotificacoes(new EmailNotificador());
$sistemasSMS = new SistemaNotificacoes(new SMSNotificador());
$sistemasWhatsapp = new SistemaNotificacoes(new NotificadorWhatsapp());

$sistemasEmail->enviarNotificacao("joao@gmail.com", "Seu pedido foi confirmado!");
$sistemasSMS->enviarNotificacao("11999999999", "Seu pedido foi confirmado!");
$sistemasWhatsapp->enviarNotificacao("11999999999", "Seu pedido foi confirmado!");
