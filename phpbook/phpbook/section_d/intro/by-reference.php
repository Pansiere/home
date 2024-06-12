<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Using bindValue() to replace a SQL placeholder</title>
    <style>
      body {
        font-family: Gotham, Helvetica, Arial, sans-serif;
        color: #58595B;
        background: #f7f7f7;
      }
      h1 { text-transform: uppercase; }
    </style>
  </head>
  <body>

  	<h1>Variable assignment by reference</h1>

    <p>p530 - 531 discussed assigning values by reference.<br>
    Here are some examples to illustrate the concepts discussed on that page.</p>


    <h2>Assigning variable value</h2>
    <?php
    $greeting1 = 'Hi';         // Initialize $greeting1 and give it a value of "Hi"
    $welcome1  = $greeting1;   // Initiazlise $welcome1 and assign value from $greeting1
    $greeting1 = 'Hello';      // Update value in $greeting - will not update $welcome1
    ?>
    <p>The value of <code>$greeting1</code> and <code>$welcome1</code> will be different.</p>
    <p>
        <code>$greeting1:</code> <?= $greeting1 ?><br>
        <code>$welcome1:</code> <?= $welcome1 ?><br>
        <code>$greeting1:</code> <?= $greeting1 ?><br>
    </p>


    <h2>Assigning by reference</h2>
    <?php
    // Assigning by reference
    $greeting2 = "Hi";         // Initialize $greeting2 and give it a value of "Hi"
    $welcome2  = &$greeting2;  // Initialize $welcome2 and point it to the same place where $greeting1 is stored
    $greeting2 = "Hello";      // Update $greeting2
    ?>
    <p>The value of <code>$greeting1:</code> and <code>$welcome1:</code> will be the same.</p>
    <p>
	    <code>$greeting2:</code> <?= $greeting2 ?><br>
	    <code>$welcome2:</code> <?= $welcome2 ?><br>
	    <code>$greeting2:</code> <?= $greeting2 ?><br>
    </p>


    <h2>Passing variable by reference into function</h2>
    <?php
    $current_count = 0;                  // Initialize $current_count
    function update_counter(&$counter)   // Use $counter as a parameter name - it points to where $current_count is stored
    {
	    $counter ++; // Add 1 to counter 
    }
    update_counter($current_count);      // Call the function three times - each time it will udpate $current_count
    update_counter($current_count);
    update_counter($current_count);
    ?>
    <p>The <code>$current_count</code> variable is declared outside of the function. Its value is updated because it is passed by reference to the function.</p>
    <p><code>$current_count</code>:	<?= $current_count; ?></p>

  </body>
</html>