int estadoActual1=0;
int estadoActual2=0;
int estadoUltimo=0;
int contador=0;
float radioEnCm=1.3;   //ingresar radio cm
float pi=3.1416;
float perimetroRueda=2*pi*(radioEnCm/100);  //Calcula Perimetro en metros
float distRecorrida=0;
float distKM=0;
int tiempo1=0;
int tiempo2=0;
int tiempo3=0;
float tiempo4=0;
float velocidad=0;

void setup(){
        pinMode(13,OUTPUT);
        pinMode(3,INPUT);
        Serial.begin(9600);
}

void distancia(){
                        distRecorrida=perimetroRueda*contador;
                        distKM=distRecorrida/1000;
                        }

void VEL(){
        if (contador%2 == 0 ) {
              tiempo1=millis();
        }
        else {
              tiempo2=millis();
        }
        tiempo3=abs(tiempo2-tiempo1); //hay que pasar el tiempo a hrs
        tiempo4=(((tiempo3/1000.0)/60.0)/60.0);
        velocidad=((perimetroRueda/1000)/tiempo4);
        Serial.print("velocidad= ");
        Serial.print(velocidad);   
        Serial.println(" Km/h");   
}

void loop(){
        estadoActual1=digitalRead(3);
        delay(1);
        estadoActual2=digitalRead(3);
        if (estadoActual1 == estadoActual2) {
              if (estadoActual1 != estadoUltimo){
                    if (estadoActual1 == HIGH) {
                        contador = contador + 1;
                        distancia();
                        VEL();
                    }
              }
        }
        estadoUltimo= estadoActual1;
              
        if (contador%2 == 0 ) {
              digitalWrite(13, LOW);
        }
        else {
              digitalWrite(13, HIGH);
        }
}

