# Changelog

## 0.1.0 (2025-12-12)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/devdraftengineer/php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([aa2abd8](https://github.com/devdraftengineer/php/commit/aa2abd85bf3e3403d4f989faea42c70cfa5ac36b))
* add idempotency header support ([29dac0b](https://github.com/devdraftengineer/php/commit/29dac0b798ad39de91fd85fcdbc3bf37a99e6352))
* allow both model class instances and arrays in setters ([64e8c12](https://github.com/devdraftengineer/php/commit/64e8c1272d31ad2a9a62a3a9eb1d7882010c2563))
* split out services into normal & raw types ([261352f](https://github.com/devdraftengineer/php/commit/261352fc8237ce482a00639339a038aa9f0045c3))
* support unwrapping envelopes ([75cb878](https://github.com/devdraftengineer/php/commit/75cb878783bda219f6385e9abec05dfee08578ab))
* use camel casing for all class properties ([d097bac](https://github.com/devdraftengineer/php/commit/d097bac9a83ac41a13c9797c6987ff317f34faba))


### Bug Fixes

* a number of serialization errors ([5622e5f](https://github.com/devdraftengineer/php/commit/5622e5f41065b1ad3460c81e4519e6483627c0df))
* correctly serialize dates ([854c313](https://github.com/devdraftengineer/php/commit/854c313e54edf3976455ac6bc3e179b99ba830e2))


### Chores

* be more targeted in suppressing superfluous linter warnings ([50971db](https://github.com/devdraftengineer/php/commit/50971db586a5ecb14e39abb2e248ba23f48cd55d))
* better support for phpstan ([57f2e88](https://github.com/devdraftengineer/php/commit/57f2e88bc76e29158c4379a42bf7daffabccf7c1))
* ensure constant values are marked as optional in array types ([6bf15d4](https://github.com/devdraftengineer/php/commit/6bf15d4c539577b6dd14132a027f3b256ba30432))
* formatting ([b6ffad7](https://github.com/devdraftengineer/php/commit/b6ffad7f96b1a5c14a16dc65e6542b229b3ccdee))
* **internal:** codegen related update ([043925e](https://github.com/devdraftengineer/php/commit/043925e77e35e048195815ef41a3d46dca03f22d))
* **internal:** codegen related update ([f4aa394](https://github.com/devdraftengineer/php/commit/f4aa394fad9fe880f57916515b8ed5bf39611af4))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([0eca833](https://github.com/devdraftengineer/php/commit/0eca833f4d26a03c572a55f4a631bfee369dede9))
* sync repo ([b6086f7](https://github.com/devdraftengineer/php/commit/b6086f72eedca654aab50ebe90cae41a3a35203f))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([89b0d62](https://github.com/devdraftengineer/php/commit/89b0d623d2a9f4981cf4679b17d9342df4897171))
