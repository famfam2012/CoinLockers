describe('My First Test', function() {
  it('Visits the Kitchen Sink', function() {
	  cy.visit("http://localhost:85/CoinLocker/public/")
	  
	  cy.contains('Tap to start').click()
	  cy.contains('S').click()
	  cy.wait(1500)
	  cy.visit("http://localhost:85/CoinLocker/public/Deposit?pass=1111&locker=1&status=2")
	  cy.wait(1500)
	  cy.contains('Tap to start').click()
	  cy.wait(1500)
	  cy.visit("http://localhost:85/CoinLocker/public/withdraw?pass=1111&locker=1")
	  cy.wait(1500)
	  cy.get('#next').click() 
	  cy.wait(1500)
	  cy.get('#b_500').click() 
	  cy.wait(1000)
	  cy.get('#withdraw').click() 
	  
  })
})