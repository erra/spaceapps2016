#include <VirtualWire.h>  //incluimos la libreria de virtualwire

int  Adelante = 12; //Asignamos el 12 como salida rele
int  Atras = 5; //Asignamos el 5 como salida rele
int  Izquierda = 6; //Asignamos el 6 como salida rele
int  Derecha = 7; //Asignamos el 7 como salida rele


void setup() {
 vw_setup(7000);        //Seleccionamos la velocidad de transmision de datos
 vw_rx_start();         //Iniciamos la comunicación
 pinMode(Adelante, OUTPUT);  //Asignamos la variable como salida
 //pinMode(Atras, OUTPUT);  //Asignamos la variable como salida
// pinMode(Izquierda, OUTPUT);  //Asignamos la variable como salida
// pinMode(Derecha, OUTPUT);  //Asignamos la variable como salida
  
 }

void loop(){
 uint8_t msg[VW_MAX_MESSAGE_LEN];
 uint8_t len = VW_MAX_MESSAGE_LEN;

if (vw_get_message(msg, &len)){  //Condicion para ver si hay mensaje
 if ( msg[0] == 'A') {
 digitalWrite(Adelante, HIGH);  
 }
 else {
 digitalWrite(Adelante, LOW); 
 }
}
}
