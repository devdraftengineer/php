# Changelog

## 0.1.0 (2026-01-17)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/devdraftengineer/php/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([aa2abd8](https://github.com/devdraftengineer/php/commit/aa2abd85bf3e3403d4f989faea42c70cfa5ac36b))
* add idempotency header support ([29dac0b](https://github.com/devdraftengineer/php/commit/29dac0b798ad39de91fd85fcdbc3bf37a99e6352))
* allow both model class instances and arrays in setters ([64e8c12](https://github.com/devdraftengineer/php/commit/64e8c1272d31ad2a9a62a3a9eb1d7882010c2563))
* improved phpstan type annotations ([53da1b6](https://github.com/devdraftengineer/php/commit/53da1b633e45a57b765b6a7f3d7f9e1a9da56bfa))
* replace special flag type `omittable` with just `null` ([8333910](https://github.com/devdraftengineer/php/commit/8333910982d05539cfa96b80b83dcc18c30fb119))
* simplify and make the phpstan types more consistent ([8fee102](https://github.com/devdraftengineer/php/commit/8fee1027b41f238d316c4de48b3a4789da07ac52))
* split out services into normal & raw types ([261352f](https://github.com/devdraftengineer/php/commit/261352fc8237ce482a00639339a038aa9f0045c3))
* support unwrapping envelopes ([75cb878](https://github.com/devdraftengineer/php/commit/75cb878783bda219f6385e9abec05dfee08578ab))
* use aliases for phpstan types ([eb859d6](https://github.com/devdraftengineer/php/commit/eb859d67d2ef9dd3c8eda97b4f7e9bd6bb731a07))
* use camel casing for all class properties ([d097bac](https://github.com/devdraftengineer/php/commit/d097bac9a83ac41a13c9797c6987ff317f34faba))


### Bug Fixes

* a number of serialization errors ([5622e5f](https://github.com/devdraftengineer/php/commit/5622e5f41065b1ad3460c81e4519e6483627c0df))
* correctly serialize dates ([854c313](https://github.com/devdraftengineer/php/commit/854c313e54edf3976455ac6bc3e179b99ba830e2))
* support arrays in query param construction ([82836dc](https://github.com/devdraftengineer/php/commit/82836dcbc06f310750b9f6663905e62af189c1bb))
* typos in README.md ([f934676](https://github.com/devdraftengineer/php/commit/f9346763da1020415587d703d15ac32b9f5c3500))


### Chores

* add git attributes and composer lock file ([61275da](https://github.com/devdraftengineer/php/commit/61275da98acc1104c89ad20fa71c2030fc581e0d))
* be more targeted in suppressing superfluous linter warnings ([50971db](https://github.com/devdraftengineer/php/commit/50971db586a5ecb14e39abb2e248ba23f48cd55d))
* better support for phpstan ([57f2e88](https://github.com/devdraftengineer/php/commit/57f2e88bc76e29158c4379a42bf7daffabccf7c1))
* ensure constant values are marked as optional in array types ([6bf15d4](https://github.com/devdraftengineer/php/commit/6bf15d4c539577b6dd14132a027f3b256ba30432))
* formatting ([b6ffad7](https://github.com/devdraftengineer/php/commit/b6ffad7f96b1a5c14a16dc65e6542b229b3ccdee))
* **internal:** add a basic client test ([5c26864](https://github.com/devdraftengineer/php/commit/5c268648b83ce63fe29e5ecef4745d5de74c8501))
* **internal:** codegen related update ([819257e](https://github.com/devdraftengineer/php/commit/819257ef0bf94e1bad125a4cd721164534834b3d))
* **internal:** codegen related update ([50bf6bf](https://github.com/devdraftengineer/php/commit/50bf6bf6332586e0b1f771e403763dd9f1cb02be))
* **internal:** codegen related update ([d36b975](https://github.com/devdraftengineer/php/commit/d36b9756caf4bb9434cb8e85dcbb5bc674bf68b2))
* **internal:** codegen related update ([b4c9801](https://github.com/devdraftengineer/php/commit/b4c98017e132e0d59ea9acd39cc573a27b078c13))
* **internal:** codegen related update ([a54ad25](https://github.com/devdraftengineer/php/commit/a54ad253da8852bd3ff7f92fdb6500997a8f5da1))
* **internal:** codegen related update ([132dfee](https://github.com/devdraftengineer/php/commit/132dfeef0f2d124cdb1d0e5aab99764dde0c3d28))
* **internal:** codegen related update ([5cd2219](https://github.com/devdraftengineer/php/commit/5cd22194ac4b087a210f063cd68d5f8fb86737c8))
* **internal:** codegen related update ([cb8b5d0](https://github.com/devdraftengineer/php/commit/cb8b5d0b9d824c350e8c8eca279758720698208d))
* **internal:** codegen related update ([1c071fb](https://github.com/devdraftengineer/php/commit/1c071fb4415b075d4f4013871a5d890fbb86184c))
* **internal:** codegen related update ([043925e](https://github.com/devdraftengineer/php/commit/043925e77e35e048195815ef41a3d46dca03f22d))
* **internal:** codegen related update ([f4aa394](https://github.com/devdraftengineer/php/commit/f4aa394fad9fe880f57916515b8ed5bf39611af4))
* **internal:** minor test script reformatting ([27edd14](https://github.com/devdraftengineer/php/commit/27edd144b8be1170f0e1b141398e16a319558966))
* **internal:** refactor auth by moving concern from base client into client ([d1ebb85](https://github.com/devdraftengineer/php/commit/d1ebb85b7301f8af329ff0c02b3b7173c9de8e18))
* **internal:** update `actions/checkout` version ([d472900](https://github.com/devdraftengineer/php/commit/d472900c1c705403bec038827ead6b4ca9d79c32))
* **readme:** remove beta warning now that we're in ga ([3a87f2a](https://github.com/devdraftengineer/php/commit/3a87f2a88315fdc298faeef87e42f4763b37365c))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([0eca833](https://github.com/devdraftengineer/php/commit/0eca833f4d26a03c572a55f4a631bfee369dede9))
* sync repo ([b6086f7](https://github.com/devdraftengineer/php/commit/b6086f72eedca654aab50ebe90cae41a3a35203f))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([89b0d62](https://github.com/devdraftengineer/php/commit/89b0d623d2a9f4981cf4679b17d9342df4897171))
