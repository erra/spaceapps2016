// Gas metano
// 5V           Vcc
// GND          GND
// A0           A4
// sobre los 500 es peligroso para la salud

int Sulfuro; 
void setup() { 
  Serial.begin(9600);    // Activa el puerto Serial a 9600 Baudios}
}
void loop() { 
  Sulfuro = analogRead(A4);   // Estos es para leer la señal Para configuraciones futuras
  Serial.println(Sulfuro);
  if ( 500 <= Sulfuro ){
  Serial.println("EVACUE MORTALIDAD");
 delay(500);
  }
   else{
  Serial.println("AIRE LIMPIO");
  delay(500);
     }
  }
