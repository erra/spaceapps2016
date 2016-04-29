int variable;

void setup() {
	Serial.begin(9600);
	pinMode(10, INPUT);
}

void loop() {
        Serial.print("lectura analogica= ");
	Serial.println(analogRead(A0)); //lectura analógica
        Serial.print("lectura digital= ");
	Serial.println(digitalRead(10)); //lectura digital
        variable = map(analogRead(A0),1023,0, 0,100);
        
        Serial.print(variable);
        Serial.println(" %");
        delay(1000);
        
        

}


