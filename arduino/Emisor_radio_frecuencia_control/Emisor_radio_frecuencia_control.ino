#include <VirtualWire.h>  //incluimos la libreria de virtualwire
 char *msg = "";           //Asignamos el mensaje en blanco

void setup(){
 vw_setup(7000);            //Configuramos la velocidad de transimsion de datos
 pinMode(5, INPUT);    //Configuramos el pin boton como entrada
 }

void loop () {
  
 if ( digitalRead(5) == HIGH) {          //Condicion para ver si esta activado el boton Adelante
 msg = "A";                               //Si lo esta, asignamos la letra A al mensaje
 vw_send((uint8_t *)msg, strlen(msg));  //y enviamos este mensaje
 }
 /*
 if ( digitalRead(2) == HIGH) {          //Condicion para ver si esta activado el boton Atras
 msg = "B";                              //Si lo esta, asignamos la letra B al mensaje
 vw_send((uint8_t *)msg, strlen(msg));  //y enviamos este mensaje
 }
  if ( digitalRead(3) == HIGH) {          //Condicion para ver si esta activado el boton Izquierda
 msg = "C";                //Si lo esta, asignamos la letra E al mensaje
 vw_send((uint8_t *)msg, strlen(msg));  //y enviamos este mensaje
 }
  if ( digitalRead(4) == HIGH) {          //Condicion para ver si esta activado el boton Derecha
 msg = "D";                //Si lo esta, asignamos la letra E al mensaje
 vw_send((uint8_t *)msg, strlen(msg));  //y enviamos este mensaje
 }
 */
}
