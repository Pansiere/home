print(" Programa feito por João Pedro Vicente Pansiere.\n")

print("\n Programa de cálculo do IMC.")
print("\n Oque é IMC?\n O IMC (Índice de Massa Corporal) é uma medida que relaciona o peso e a altura de uma pessoa para avaliar se o peso está saudável. É calculado dividindo o peso em quilogramas pela altura em metros ao quadrado. O resultado classifica em categorias como abaixo do peso, peso saudável, sobrepeso e diferentes graus de obesidade. ")

peso = (float(input(" Digite seu peso: ")))
altura = (float(input(" Digite sua altura: ")))

resultado = peso / altura ** 2

if resultado < 17:
    print(f"Seu IMC é: {resultado:.2f}, esta muito abaixo do peso. Procure um médico. Algumas pessoas têm um baixo peso por características do seu organismo e tudo bem. Outras podem estar enfrentando problemas, como a desnutrição. É preciso saber qual é o caso.")
elif resultado == 17 or resultado <= 18.49:    
    print(f"Seu IMC é: {resultado:.2f}, esta abaixo do peso. Procure um médico. Algumas pessoas têm um baixo peso por características do seu organismo e tudo bem. Outras podem estar enfrentando problemas, como a desnutrição. É preciso saber qual é o caso.")
elif resultado == 18.50 or resultado <= 24.99:
    print(f"Seu IMC é: {resultado:.2f}, esta no peso normal. Que bom que você está com o peso normal! E o melhor jeito de continuar assim é mantendo um estilo de vida ativo e uma alimentação equilibrada.")
elif resultado == 25 or resultado <= 29.99:
    print(f"Seu IMC é: {resultado:.2f}, esta acima do peso. Ele é, na verdade, uma pré-obesidade e muitas pessoas nessa faixa já apresentam doenças associadas, como diabetes e hipertensão. Importante rever hábitos e buscar ajuda antes de, por uma série de fatores, entrar na faixa da obesidade pra valer.")    
elif resultado == 30 or resultado <= 34.99:
    print(f"Seu IMC é: {resultado:.2f}, esta em Obesidade I. Sinal de alerta! Chegou na hora de se cuidar, mesmo que seus exames sejam normais. Vamos dar início a mudanças hoje! Cuide de sua alimentação. Você precisa iniciar um acompanhamento com nutricionista e/ou endocrinologista.")      
elif resultado == 35 or resultado <= 39.99:
    print(f"Seu IMC é: {resultado:.2f}, esta em Obesidade II(severa). Mesmo que seus exames aparentem estar normais, é hora de se cuidar, iniciando mudanças no estilo de vida com o acompanhamento próximo de profissionais de saúde.")  
else:
    print(f"Seu IMC é: {resultado:.2f}, esta em Obesidade III(mórbida). Aqui o sinal é vermelho, com forte probabilidade de já existirem doenças muito graves associadas. O tratamento deve ser ainda mais urgente.")      

print(" Fim do programa.")
input(" Pressione Enter para sair...")
