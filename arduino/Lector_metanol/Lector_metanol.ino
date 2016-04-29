// Gas metano
// 5V           Vcc
// GND          GND
// A0           A0
// sobre los 5% ya es peligroso para salud "Aviso"
// sobre el 10% alerta de emergencia de gravedad
// sobre los 15% alerta de evacuacion ya que que es letal 
int Metano; 
void setup() { 
  Serial.begin(9600);    // Activa el puerto Serial a 9600 Baudios}
  pinMode(4,OUTPUT);
  pinMode(6,OUTPUT);
  pinMode(8,OUTPUT);
}
void loop() { 
  Metano = analogRead(A0);
  Serial.println("AIRE NORMAL");
  Serial.println(Metano);
  if ( 825 >=Metano && 849 <=Metano ){      //15%
  //digitalWrite(4, HIGH);
  Serial.println("ALTA MORTALIDAD EVACUAR INMEDIATAMENTE");
  }
  if ( 850 >=Metano && 898 <=Metano ){      //10%
  //digitalWrite(6,HIGH);
  Serial.println("ALTA GRAVEDAD EVACUAR");
  }
  if ( 900 >=Metano && 849 <=Metano){      //5%
  //digitalWrite(8,HIGH);
  Serial.println("PELIGROSO PARA LA SALUD");
  } 
 delay(500); 
}
