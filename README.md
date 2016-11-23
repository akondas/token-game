# Token Game

Model and tests (with phpspec)

```
  TokenGame\Game

18  ✔ is initializable
28  ✔ should be able to win
43  ✔ should not allow for more than 5 moves
60  ✔ should not allow for move after max duration
  
    TokenGame\Token

13  ✔ is initializable
18  ✔ should be covered by default
23  ✔ should not be wining by default
28  ✔ should be able to discover
37  ✔ should be able to be winning
46  ✔ should return wining status on discover

  TokenGame\Board\DefaultBoard

16  ✔ is initializable
21  ✔ should be able to add token
33  ✔ should be able to discover token
45  ✔ should be able to discover wining token
57  ✔ should shuffle added tokens
72  ✔ should not allow discover same token
84  ✔ should throw exception on invalid column
89  ✔ should throw exception on invalid row

  TokenGame\Timer\DefaultTimer

13  ✔ is initializable
18  ✔ should be able to start
27  ✔ should return false if limit has not been exceeded
36  ✔ should return true if limit has been exceeded
```
