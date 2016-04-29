int variable;

void setup()
{
  Serial.begin(9600);
  pinMode(10, OUTPUT);
}

void loop() 
{ 
	Serial.println(analogRead(A0)); //lectura analógica
        Serial.print("lectura digital= ");
	Serial.println(digitalRead(10)); //lectura digital
        variable = map(analogRead(A0),1023,0, 0,100);
        Serial.print(variable);
        Serial.println(" %");
        delay(500);
        if (variable >= 5% ){
          digitalWrite(10, HIGH);
        }
}
