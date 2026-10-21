<?php

namespace App\Services\Promotions;

class PromotionLegalContent
{
    public function terms(): string
    {
        return <<<'TEXT'
1. ORGANIZADOR
CACAO DEL PERU, RUC 10753849063, con domicilio en APV. Las Torres de Mantaro S/N, distrito de Parcona, provincia y departamento de Ica, Perú. Consultas: promo@cacaodelperu.com.

2. VIGENCIA
Las fechas de inicio, cierre de registros y sorteo son las indicadas en el calendario de esta página, obtenido de la campaña configurada en el sistema. Todos los horarios corresponden a Perú (America/Lima). Solo participan códigos registrados dentro de la vigencia.

3. PARTICIPANTES
Pueden participar personas naturales de 18 años o más, residentes en Perú, que proporcionen nombre completo, correo y celular veraces y acepten estas bases. La identidad del participante se agrupa por correo normalizado; usar correos distintos no otorga derecho a ganar más de un premio. La identidad y mayoría de edad se verificarán al reclamar el premio.

4. MECÁNICA Y CUPONES FÍSICOS
Por compras que cumplan el importe mínimo y la proporción por código indicados en esta página, el cliente recibe cupones impresos al entregar su compra, tanto en ventas web como presenciales. El costo del envío no genera códigos. Los cupones no se entregan digitalmente. Cada código válido, único y registrado en /promo equivale a una participación. No basta con recibir el cupón: debe registrarse antes del cierre. Conserva tu cupón para verificarlo si resultas ganador. La aceptación de publicidad es opcional y no afecta las posibilidades de ganar.

5. PREMIOS
Se otorgarán tres premios a tres personas distintas: una caja de 10 chocolates Miskicha; un conjunto de polvo de cacao y café molido; y un conjunto de café molido y prensa francesa. La presentación y contenido exactos deberán corresponder a lo anunciado por el organizador. No se ofrece canje por dinero.

6. SORTEO Y GANADORES
Los ganadores se elegirán mediante sorteo aleatorio entre las participaciones válidas. Se seleccionará un ganador distinto por premio; se excluirán las participaciones de personas ya premiadas antes de seleccionar el siguiente. El organizador verificará identidad y validez de los códigos, conservará un acta del sorteo y contactará a cada ganador por el correo y celular registrados. Estas bases no anuncian una transmisión en vivo. La fecha y hora figuran en el calendario de la campaña.

7. RECLAMO Y ENTREGA
El ganador dispone de 15 días calendario, contados desde el día siguiente del sorteo, para reclamar su premio y coordinar su entrega mediante promo@cacaodelperu.com. El plazo no exige recibir el envío dentro de esos 15 días. Puede recogerlo en el stand de Cacao del Perú, segundo piso del Centro Comercial MegaPlaza Ica, de 4:30 p. m. a 9:30 p. m., previa coordinación, presentando un documento de identidad vigente que permita verificar nombre y mayoría de edad. También puede solicitar envío dentro de Perú: el costo será asumido por el ganador y se informará antes de coordinarlo. La dirección de envío se solicita únicamente para gestionar la entrega.

8. PREMIO NO RECLAMADO
Si el ganador no reclama el premio dentro del plazo establecido, pierde el derecho a recibirlo y no se elegirá suplente. Se conservará constancia de los intentos de contacto por correo y teléfono. Esta condición se aplicará sin perjuicio de las disposiciones imperativas que correspondan.

9. DEVOLUCIONES, CÓDIGOS INVÁLIDOS Y FRAUDE
Al devolver productos deben devolverse también los cupones correspondientes para su invalidación. Los códigos invalidados no participan, incluso si fueron registrados. Los códigos duplicados, inexistentes o de lotes deshabilitados no otorgan participaciones válidas. La revisión de un posible fraude debe sustentarse y documentarse; no permite alterar arbitrariamente las bases ni desconocer los derechos del consumidor.

10. DATOS PERSONALES Y CONSULTAS
El tratamiento se describe en la Política de Privacidad y Tratamiento de Datos Personales. No se publicarán correos, celulares, documentos ni direcciones de participantes. Consultas, reclamos y coordinación: promo@cacaodelperu.com. Las condiciones publicadas y los derechos reconocidos por la legislación peruana deben respetarse.
TEXT;
    }

    public function privacy(): string
    {
        return <<<'TEXT'
1. RESPONSABLE Y ALCANCE
CACAO DEL PERU, RUC 10753849063, con domicilio en APV. Las Torres de Mantaro S/N, Parcona, Ica, Perú, es responsable del tratamiento descrito para esta promoción. Contacto de privacidad y reclamos: promo@cacaodelperu.com. Esta política se refiere al registro y gestión de la promoción; no establece plazos de conservación de comprobantes de compra u otros tratamientos ajenos a ella.

2. DATOS Y FINALIDADES
Se tratan nombre completo, correo, celular, códigos registrados, fechas de registro y aceptación, preferencias de publicidad y datos técnicos de seguridad, como dirección IP y navegador. Se utilizan para registrar participaciones, prevenir registros abusivos, verificar códigos, realizar el sorteo, contactar ganadores, entregar premios y atender consultas o reclamos. Al entregar un premio puede verificarse un documento de identidad y, para un envío, solicitarse la dirección de destino. No se requiere adjuntar una copia del documento en el formulario de participación.

3. OBLIGATORIEDAD Y PUBLICIDAD OPCIONAL
Los datos señalados como obligatorios son necesarios para participar y contactar al ganador; sin ellos no se puede completar el registro. La persona declara ser mayor de edad y residente en Perú. Recibir novedades, ofertas o promociones requiere una elección expresa, separada, opcional y no preseleccionada. Rechazarla o retirarla no afecta la participación. La aceptación de las bases no autoriza por sí sola el envío de publicidad.

4. ACCESO, PROVEEDORES Y SEGURIDAD
El acceso se limita al personal autorizado y a proveedores que intervengan en el alojamiento, soporte o entrega, bajo las instrucciones y medidas de seguridad que correspondan. Si se elige envío, se comunicarán al transportista solo los datos necesarios para realizarlo. Los datos no se venden. Antes de habilitar servicios que impliquen nuevas transferencias, especialmente internacionales, se deberá informar su alcance y cumplir los requisitos aplicables. No se publican listados con correos, celulares o documentos de participantes.

5. CONSERVACIÓN
Los datos de la promoción se conservarán durante 12 meses después de su cierre operativo, entendido como el vencimiento del plazo de 15 días calendario para reclamar premios después del sorteo. Después se eliminarán o anonimizarán. Solo se conservará de forma restringida la información necesaria para obligaciones legales o reclamos pendientes durante el plazo aplicable. Este período no autoriza conservar indefinidamente los datos con fines publicitarios. El retiro del consentimiento comercial debe atenderse por separado.

6. DERECHOS Y CONTACTO
Puedes solicitar información sobre tus datos, acceso, rectificación, cancelación u oposición, así como retirar el consentimiento publicitario, escribiendo a promo@cacaodelperu.com. Indica tu solicitud y un medio de respuesta. Se verificará tu identidad de forma proporcional antes de comunicar o modificar información; conocer un correo no permite acceder a los datos de otra persona. Las solicitudes se atenderán conforme a los plazos y condiciones legales aplicables. También puedes acudir a la Autoridad Nacional de Protección de Datos Personales.

7. SESIÓN Y COOKIES
El registro utiliza cookies de sesión y mecanismos de seguridad para mantener la continuidad del formulario, protegerlo contra solicitudes no autorizadas y mostrar los códigos registrados en esa sesión. Los datos no se exponen públicamente por ingresar un correo conocido.
TEXT;
    }
}
