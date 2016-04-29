 void setup() {
	Serial.begin(9600);
	pinMode(10, INPUT);
}
 
void loop() {
	//Serial.println(analogRead(A0)); //lectura analógica
	//Serial.println(digitalRead(10)); //lectura digital
        if(digitalRead(10) == 1){
        Serial.println("normal");
        }else{
        Serial.println("lluvia");
        }	
delay(1000);
}

 
